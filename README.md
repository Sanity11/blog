[![Build Status](https://travis-ci.org/Sanity11/blog.svg?branch=master)](https://travis-ci.org/Sanity11/blog)

# Experiment

## Experimental repo

- DDD
- CI
- Unit Testing
- Containerizing

## Containers

- NGINX
- PHP with XDebug
- MySql

## Docker commands

All running containers

    docker ps

All containers including stopped
    
    docker ps -a
    
Remove container

    docker rm <container_name>
    
List images on the system

    docker images
    
Remove docker images

    docker rmi <image_name_or_id>
    
Remove at any cost
    
    docker rmi <image_name_or_id> --force
    
All networks

    docker network ls
    
Pull container from docker hub

    docker pull <vendor>/<container>:<tag>
    
Container info

    docker inspect <container_name>
    
## Docker compose commands    
    
Up docker-compose.yml (from same directory)
    
    docker-compose up
    
Without building images
    
    docker-compose up --no-build

Shutdown

    docker-compose down
    
## Good to know

Docker containers are exposed in other containers by their name. To connect to MySql with php do the following:

    $db = new PDO('mysql:host=mysql;dbname=blog;charset=utf8mb4', 'blog', 'blog');
    
Likewise php_fpm is running on php_fpm:9000, for your nginx config you do for example:

    location ~ ^/index\.php(/|$) {
        fastcgi_pass php_fpm:9000;
        fastcgi_split_path_info ^(.+\.php)(/.*)$;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        fastcgi_param DOCUMENT_ROOT $realpath_root;

        internal;
    }
    
Don't forget to catch all other php requests that don't match the front controller ;)

    location ~ \.php$ {
        return 404;
    }

## Travis

[Travis CI Blog](http://travis-ci.org/Sanity11/blog)

## Ngrok

Use ngrok for travis webhook maybe? So I can have a local deployment script

## Unit Testing

### Test symfony/console commands with ease like this

    /**
     * Setup application to mimic a cli, catch output in temp file
     *
     * @param string $command
     * @return string|StreamOutput
     * @throws \Exception
     */
    private function runCommand(string $command)
    {
        $fp = tmpfile();
        $input = new StringInput($command);
        $output = new StreamOutput($fp);

        $application = new Application();
        $application->setAutoExit(false);

        $application->add(new OrderCommand());
        $application->run($input, $output);

        fseek($fp, 0);
        $output = '';
        while (!feof($fp)) {
            $output = fread($fp, 4096);
        }
        fclose($fp);

        return $output;
    }

Now you can test commands like this:

    $output = $this->runCommand('somecommand <argument>');
    
    $this->assertEquals("I expect this output\n", $output);

## @todo

- Error logging
- Database storage location
- Load balancing between containers, multiple servers ... hmmm
- docker-compose-dev.yml for xdebug less deployment?
- Monitoring containers?


