node {
    checkout scm

    stage("Cleanup Old Containers") {
        sh 'docker compose down || true'
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

    stage("Laravel Setup") {
        sh 'docker compose exec -T app php artisan key:generate || true'
        sh 'docker compose exec -T app php artisan migrate --force'
    }
}