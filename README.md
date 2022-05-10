# GraphQL-PHP
A POC for the integration of GraphQL and PHP

This project is the code accompanying [this post](). It's a simple Proof of Concept for the usage of [GraphQL-PHP](https://github.com/webonyx/graphql-php).

## Dependencies

This project was tested on Linux and php8.1. It's designed to be run using [docker](https://www.docker.com/)

## Running

The best way to see it in action is by leveraging [docker-compose](https://docs.docker.com/compose/):

```
docker-compose up --build -d
```

Then, use any GraphQL client ([Altair](https://altair.sirmuel.design/) is recommended) and browse through the API documentation to run queries.

The endpoint will be found at `http://localhost:54000`

### Example query

Once the server is up and running, you can use a query like this:

```graphql
curl 'http://localhost:54000' -H 'Accept-Encoding: gzip, deflate, br' -H 'Content-Type: application/json' -H 'Accept: application/json' -H 'Connection: keep-alive' --data-binary '{"query":"{User(id: \"bad31\") {name}}"}' --compressed
```

To get a response like:

```json
{
  "data": {
    "User": {
      "name": "Peter"
    }
  }
}
```
