node {
    env.APP_URL = "http://localhost:8000"

    checkout scm

    stage("Build") {
        sh 'docker compose up -d --build'
    }

    stage("Testing") {
        sh 'docker compose exec -T app php artisan --version'
        sh 'echo "Ini adalah test"'
    }

    stage("Deploy") {
        sh 'docker compose exec -T app php artisan key:generate || true'
        sh 'docker compose exec -T app php artisan migrate --force'
    }
}
