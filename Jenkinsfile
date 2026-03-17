node {
    stage("Prepare Workspace") {
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
        docker compose exec -T --user $(id -u):$(id -g) app sh -c "
            git config --global --add safe.directory /var/www &&
            composer install --no-interaction --prefer-dist
        "
        '''
    }

    stage("Build Frontend Assets") {
        sh '''
        docker run --rm \
          -u $(id -u):$(id -g) \
          -v "$PWD":/app \
          -w /app \
          node:20 \
          sh -c "npm install && npm run build"
        '''
    }

    stage("Prepare Laravel Environment") {
        sh '''
        test -f .env || cp .env.example .env
        sed -i 's/^DB_CONNECTION=.*/DB_CONNECTION=mysql/' .env
        sed -i 's/^DB_HOST=.*/DB_HOST=mysql/' .env
        sed -i 's/^DB_PORT=.*/DB_PORT=3306/' .env
        sed -i 's/^DB_DATABASE=.*/DB_DATABASE=manifest-db/' .env
        sed -i 's/^DB_USERNAME=.*/DB_USERNAME=admin/' .env
        sed -i 's/^DB_PASSWORD=.*/DB_PASSWORD=manifest-password/' .env
        grep -q '^CACHE_STORE=' .env && sed -i 's/^CACHE_STORE=.*/CACHE_STORE=file/' .env || echo 'CACHE_STORE=file' >> .env
        grep -q '^SESSION_DRIVER=' .env && sed -i 's/^SESSION_DRIVER=.*/SESSION_DRIVER=file/' .env || echo 'SESSION_DRIVER=file' >> .env
        grep -q '^QUEUE_CONNECTION=' .env && sed -i 's/^QUEUE_CONNECTION=.*/QUEUE_CONNECTION=sync/' .env || echo 'QUEUE_CONNECTION=sync' >> .env
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
        sh 'docker compose exec -T app php artisan view:clear || true'
        sh 'docker compose exec -T app php artisan route:clear || true'
    }

    stage("Database Migration") {
        sh 'docker compose exec -T app php artisan migrate --force'
    }

    stage("Clear Cache After Migration") {
        sh 'docker compose exec -T app php artisan cache:clear || true'
    }

    stage("Testing") {
        sh 'docker compose exec -T app php artisan --version'
        sh 'test -f public/build/manifest.json'
        sh 'echo "Pipeline Test Success"'
    }
}