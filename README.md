## Step 1. Clone the repository

## Step 2. Generate your own OAuth consumer key and secret to build your own custom integration with Bitbucket
```
# Login in bitbucket.org

# Go to: https://bitbucket.org/{your_username}/workspace/settings/api 

# Edd consumer
```

## Step 3. Customize the .env file
```
OAUTH_BITBUCKET_CLIENT_ID=
OAUTH_BITBUCKET_SECRET_KEY=
OAUTH_BITBUCKET_CALLBACK_URI=
```

## Step 4. Install dependencies and autoload using Docker
```
docker run --rm --interactive --tty --volume $(pwd):/app composer install
```

## Step 5. Building and running containers
```
docker-compose up -d
```

## Step 6. Generate encryption keys
```
# Go to php-apache container

# Create terminal

# Execute script:
php artisan key:generate
```

## Step 7. Create a database using migrations and populate the tables with data
```
# Go to php-apache container

# Create terminal

# Execute script:
php artisan migrate --seed
```
