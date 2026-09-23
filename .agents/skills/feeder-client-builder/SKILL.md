---
name: feeder-client-builder
description: >-
  Use this skill when you need to build, integrate, or maintain the Neo Feeder client application in the feeder-asisten project. It contains instructions and API references for the PDDIKTI Neo Feeder Web Service 2.0.
---

# Neo Feeder Client Builder

This skill provides instructions for building and integrating with the Neo Feeder PDDIKTI Web Service v2.0. The application is built using the CodeIgniter framework.

## General Integration Steps

1.  **Authentication**: Every request (except `GetToken`) requires a valid token.
    *   To get a token, send a POST request to the API with `act: "GetToken"`, `username`, and `password`.
    *   Tokens should be cached/stored (e.g., in a session or config) until they expire.
2.  **Making Requests**: Requests are made using HTTP POST.
    *   URL is typically `/ws/live2.php` (or similar depending on config).
    *   Request body must contain `act` (the action name) and `token`.
    *   Optional fields for list requests: `filter`, `order`, `limit`, `offset`.
3.  **Handling Responses**: Responses are JSON strings.
    *   Check `error_code`. `0` means success. Non-zero means error (check `error_desc`).
    *   Data is in the `data` array.

## Architecture Context (CodeIgniter)
*   **Controllers**: Located in `application/controllers/`. For example, `import/Mahasiswa.php` handles Mahasiswa-related integrations.
*   **Models**: Located in `application/models/`. Use them to interact with the local database and build payloads for the Feeder API.
*   **Feeder Helper**: There is usually a helper or service function (e.g., `service_request($data_param, $Conf)` seen in `Mahasiswa.php`) that encapsulates the actual cURL/HTTP POST request to the Feeder API. Use this function for all API calls.

## References

*   [API Documentation](./references/api-docs.md): Contains the list of available actions and their structures based on Postman and PDF documentation.
