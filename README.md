User Management API 🖥️
This API is designed to manage user data, providing functionality to fetch, update, and delete users in the system. Below is an explanation of each API endpoint.

Endpoints 📍
1. GET /users 🔄
Description: Fetches a list of all users in the system.
Response: Returns a JSON array containing user objects with details such as ID, name, email, and date of birth.
Example Response:
json
Copy
Edit
[
  {
    "id": 1,
    "name": "John Doe",
    "email": "johndoe@example.com",
    "dob": "1990-01-01"
  },
  {
    "id": 2,
    "name": "Jane Smith",
    "email": "janesmith@example.com",
    "dob": "1985-05-12"
  }
]
Status Codes:
200: Successful response with user data.
500: Internal server error.
2. PUT /users?id=<user_id> ✏️
Description: Updates a user's details based on the provided user_id. The user details (e.g., name, email, date of birth) can be modified.
Request Body:
name: The updated name of the user.
email: The updated email of the user.
dob: The updated date of birth of the user.
Example Request:
json
Copy
Edit
{
  "name": "John Updated",
  "email": "johnupdated@example.com",
  "dob": "1991-02-15"
}
Response: Returns a success message if the user is successfully updated.
Status Codes:
200: Successfully updated user data.
400: Bad request (e.g., missing required fields).
404: User not found.
500: Internal server error.
3. DELETE /users?id=<user_id> 🗑️
Description: Deletes a user from the system based on the provided user_id.
Response: Returns a success message if the user is successfully deleted.
Status Codes:
200: Successfully deleted user.
404: User not found.
500: Internal server error.
Authentication 🔒
The API assumes that authentication (such as token-based authentication) is handled separately. Any requests to these endpoints should include the necessary authentication tokens (if required).

Error Handling ⚠️
If a request fails, the API will return an appropriate status code (such as 400, 404, or 500).
The response body will contain an error message providing more details about the failure.
