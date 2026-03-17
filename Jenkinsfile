node {
    stage("Prepare Workspace") {
        deleteDir()
        checkout scm
    }

    stage("Cleanup Project Containers") {
        sh 'docker compose down --remove-orphans || true'
    }

    stage("Build Containers") {
        sh 'docker compose up -d --build'
    }

    stage("Install Composer Dependencies") {
        sh '''
        docker compose exec -T app sh -c "
            git config --global --add safe.directory /var/www &&
            composer install --no-interaction --prefer-dist
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

    stage("Prepare Laravel Directories") {
        sh '''
        mkdir -p storage/framework/cache/data
        mkdir -p storage/framework/sessions
        mkdir -p storage/framework/views
        mkdir -p storage/framework/testing
        mkdir -p storage/logs
        mkdir -p bootstrap/cache
        chmod -R 775 storage bootstrap/cache || true
        '''
    }

    stage("Laravel Setup") {
        sh 'docker compose exec -T app php artisan key:generate || true'
        sh 'docker compose exec -T app php artisan config:clear'
        sh 'docker compose exec -T app php artisan cache:clear'
        sh 'docker compose exec -T app php artisan view:clear'
        sh 'docker compose exec -T app php artisan route:clear'
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