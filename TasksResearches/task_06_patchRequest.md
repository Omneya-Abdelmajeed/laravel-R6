## Comparison Between PUT and PATCH Methods
#### PUT and PATCH: Both are HTTP methods used in RESTful APIs.

| PUT request method | PATCH request method  |
|-------------|-----------|
|  Modifies a record's information or creates a new record if none exists. Replaces the entire resource with the new representation provided in the request body. Useful for updating or completely replacing a resource.        | Updates an existing resource without requiring the entire body to be sent with the request. Applies partial modifications or updates specific fields of the resource based on provided instructions. Useful for making targeted updates to a resource. |
|  Idempotent. Multiple identical requests have the same effect as a single request.      |  Not guaranteed to be idempotent. The effects of multiple identical requests may differ depending on the operations specified.  |
| used to change a record's information in the database. | Used to update an existing resource without necessarily replacing it entirely in the database.  
| Requires sending the entire new representation of the resource in the request body.  | Requires sending only the changes (instructions or operations) that should be applied to the resource in the request body. |
