node {
    checkout scm

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

    stage("Fix Permissions") {
        sh '''
        docker compose exec -T app sh -c "
            chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache &&
            chmod -R 775 /var/www/storage /var/www/bootstrap/cache
        "
        '''
    }

    stage("Laravel Setup") {
        sh 'docker compose exec -T app php artisan key:generate || true'
        sh 'docker compose exec -T app php artisan config:clear'
    }

    stage("Database Migration") {
        sh 'docker compose exec -T app php artisan migrate --force'
    }

    stage("Testing") {
        sh 'docker compose exec -T app php artisan --version'
        sh 'echo "Pipeline Test Success"'
    }
}