User Management System 🚀

This project is a user management system that allows you to view, edit, and delete users from a list.

Features 🎯
View Users: 👀 The application fetches and displays a list of users in a table format, showing details such as ID, name, email, and date of birth.

Edit User Details: ✏️ Each user entry in the table has an "Edit" button that opens a modal to update the user's details (name, email, and date of birth). Users can save the changes to update their data in the system.

Delete User: 🗑️ Each user entry has a "Delete" button that allows you to delete the user from the list. The deletion request is made to the server, and the list is updated accordingly.

Components 🧩
1. UserList
Displays the list of users in a table. 📊
Allows users to be edited or deleted via buttons in each row. ✏️❌
Fetches user data from an external API when the component is mounted. 🔄
Handles error and success messages based on API interactions.
2. Modal
A modal dialog used to edit user details. 🖊️
Contains fields for name, email, and date of birth, which can be updated by the user. 📅
The modal can be opened by clicking the "Edit" button and closed via a "Cancel" button. ❌
How It Works ⚙️
Fetching Users:

When the component is loaded, it fetches the user data from the specified API endpoint using axios. The fetched data is stored in the users state and displayed in a table format. 🔄
Editing a User:

Clicking on the "Edit" button next to a user opens a modal with that user's details pre-filled. ✏️
The user can modify the fields and submit the form to update the user. 💾
On successful submission, the user's details are updated in the list.
Deleting a User:

Clicking on the "Delete" button next to a user prompts an API request to delete the user. 🗑️
If the deletion is successful, the user is removed from the list.
Technologies Used 🛠️
React: The application is built using React for rendering the user interface. ⚛️
Axios: Used for making API requests to fetch, update, and delete user data. 🌐
CSS: Custom styles are applied to elements for layout and design. 🎨
Setup 🏁
Clone the repository to your local machine. 🖥️

Install the necessary dependencies by running the following command:

npm install
npm run dev
Start the development server:
The application will be running at localhost🌐

API Integration 🔌
This application expects an API that supports the following actions:

GET /users: Fetches the list of all users. 📡
PUT /users?id=<user_id>: Updates a user's details by ID. 🖊️
DELETE /users?id=<user_id>: Deletes a user by ID. 🗑️
Ensure the backend API is running and accessible for the front-end to work properly.

Conclusion 🎉
This user management system is a simple and efficient way to view, edit, and delete user data. ✅
