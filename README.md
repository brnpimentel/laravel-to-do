## Laravel To-Do

# Install

```
git clone git@github.com:brnpimentel/laravel-to-do.git
cd laravel-to-do
composer install
php artisan serve
```

In demo, i'm using sqlite already configured and seeded. If you want to use other database please configure `.env`, then

```
php artisan migrate
```


I just remove the `.env` line of the `.gitignore` to make things run without configuration. 

# Use

In this project, use the admin/admin credentials to enter as Administrator or peter/peter as normal user, or richard/richard as another normal user.

- User authentication and authorization
    -- Two roles: user and administrator
    -- Administrator has full permissions
- User can only create and delete their own to-do items
- Users can create a to-do list
- Users can mark to-do items as done
- Users can delete to-do items
- Administrators can see all users to-do items, including deleted to-do items

**Click in the circle oon the left site of the todo item to mark done**

In this demo I'm not using any frontend framework (Vue/React), just blade directives and tailwindcss for style.
