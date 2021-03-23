# Ecommerce

the objective of this application is to be able to allow ecommerce users to be able to view and edit product and inventory items

## Framework Setup

- clone project locally.
- ensure that docker is running on the system and has sufficient resources allocated.
- navigate to root project directory
- run command :

  ``` bash
  docker-compose up
  ```

## Use of Application

- navigate to localhost:8076
- navigate to a client page, or to add client cash flows
- if on cash flows, add date and new percentage value to update selected cash flow
  
## FAQ

if there is a port conflict on a user's local system, change the port listed in the root docker-compose.yml

## TODO

clean up JS front end code
add JS modal library, for user notifications
take the time to expand testing
reorganize code base, for futureproofing
