node {
    stage("Checkout") {
        checkout scm
    }

    stage("Build") {
        sh 'docker compose down --remove-orphans || true'
        sh 'docker compose up -d --build'
    }

    stage("Debug Containers") {
        sh 'docker compose ps'
        sh 'docker compose logs mysql || true'
    }

    stage("Install Dependencies") {
        sh '''
        docker compose exec -T --user $(id -u):$(id -g) app sh -c "
            export HOME=/tmp
            git config --global --add safe.directory /var/www
            composer install --no-interaction --prefer-dist
        "
        '''
    }

    stage("Build Frontend") {
        sh '''
        docker run --rm \
          -u $(id -u):$(id -g) \
          -v "$PWD":/app \
          -w /app \
          node:20 \
          sh -c "npm install && npm run build"
        '''
    }

    stage("Prepare Environment") {
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

    stage("Testing") {
        sh '''
        mkdir -p storage/framework/cache/data
        mkdir -p storage/framework/sessions
        mkdir -p storage/framework/views
        mkdir -p storage/framework/testing
        mkdir -p storage/logs
        mkdir -p bootstrap/cache
        chmod -R 775 storage bootstrap/cache || true
        '''
        sh 'docker compose exec -T app php artisan key:generate || true'
        sh 'docker compose exec -T app php artisan config:clear'
        sh 'docker compose exec -T app php artisan view:clear || true'
        sh 'docker compose exec -T app php artisan route:clear || true'
        sh 'docker compose exec -T app php artisan --version'
        sh 'test -f public/build/manifest.json'
    }

    stage("Deploy") {
        sh '''
        MYSQL_ID=$(docker compose ps -q mysql)

        if [ -z "$MYSQL_ID" ]; then
            echo "MySQL container not found"
            docker compose ps
            docker compose logs mysql || true
            exit 1
        fi

        until [ "$(docker inspect -f '{{if .State.Health}}{{.State.Health.Status}}{{else}}no-healthcheck{{end}}' "$MYSQL_ID")" = "healthy" ]; do
            echo "Waiting for MySQL to become healthy..."
            docker compose ps
            sleep 3
        done
        '''

        sh 'docker compose exec -T app php artisan migrate --force'
        sh 'docker compose exec -T app php artisan cache:clear || true'
    }
}