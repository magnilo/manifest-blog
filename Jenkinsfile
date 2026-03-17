node {
    deleteDir()
    checkout scm

    stage("Cleanup Old Containers") {
        sh 'docker compose down --remove-orphans || true'
    }

    stage("Build Containers") {
        sh 'docker compose up -d --build'
    }

    stage("Install Composer Dependencies") {
        sh '''
        docker compose exec -T app sh -c "
            git config --global --add safe.directory /var/www &&
            composer install
        "
        '''
    }

    stage("Build Frontend Assets") {
        sh '''
        docker run --rm \
          -v "$PWD":/app \
          -w /app \
          node:20 \
          sh -c "npm install && npm run build"
        '''
    }

    stage("Fix Permissions") {
        sh '''
        chmod -R 775 storage bootstrap/cache || true
        docker compose exec -T app sh -c "
            chmod -R 775 /var/www/storage /var/www/bootstrap/cache || true
        "
        '''
    }

    stage("Laravel Setup") {
        sh 'docker compose exec -T app php artisan key:generate || true'
        sh 'docker compose exec -T app php artisan config:clear'
        sh 'docker compose exec -T app php artisan cache:clear'
    }

    stage("Database Migration") {
        sh 'docker compose exec -T app php artisan migrate --force'
    }

    stage("Testing") {
        sh 'docker compose exec -T app php artisan --version'
        sh 'test -f public/build/manifest.json'
        sh 'echo "Pipeline Test Success"'
    }
}