# Inky

A micro blogging platform 💫 with Laravel and Blade.

Made with 💚

## SEO guide

[Google Seo Best Practices](https://developers.google.com/search/docs/appearance/publication-dates?hl=en)

[Moz SEO guide](https://moz.com/beginners-guide-to-seo)

## Registration

-   New users whether admin or commentators need to verify email upon registration.
-   admin side registration requires approval.

## Default Authentication

-   `email` - admin.bloggy@xyz.com
-   `pass` - secret
-   ⚠️ DO Update and change your default Auth right away! ⚠️ (USER)

## Must Do

-   Seed the `initAppSeeder`
    -   This creates a default admin, a default `uncategorized` category, and a default `uncategorized` subcategory.
-   Show `cookies policies`, you are using sessions storage for UI functionality.

## EDITOR

-   Ckeditor5 is used for the editor. All of the free features are in use. If you wish, you can use the premium features for convenience. You can reach out to me or integrate them as you wish.

## POST CREATION

-   You can either manually create slug or leave it up to bloggy. Bloggy generates slug for you based on your title. If you are to manually set your slug please do use `-` hyphen separated slug only.
-

## features

-   You can CRUD post, categories, subcategories.
-   Separate admin dashboard only for admins and allowed roles.
-   Commentary and reply system
-   Notfication system (queued jobs)
    -   upon comment and reply
        -   Right now, notification is deleted upon clicking the `<x-notification-card>`. You can alternatively use Laravels `markAsRead()` method to keep the notifications instead and filter based on the `readNotifications()` or `unreadNotifications()`, and render cards.
    -   Admin approving admin-side registration. `/admin/registration`
    -   Table of Content generator (You MUST set `<h3>` for each title for parapraphs for this to work)

## In development

-   Turn on the `shouldBeStrict`, will help you catch `n + 1` queries faster.

# In production

-   change the necessary `env` variables.
-   Turn off the `shouldBeStrict()`.
-   By default notification system is using `mail` and `database` for comment and relply.
-   Add the neccessary `mail` variable for your mail server.
-   Do run `sail artisan work:queue` to start the workers.
-   `sitemap.xml` either run it through custom `sitemap:generate` or set schedule this task if not found built-in out-of-the-box.

# Variables used for the layouts (UI)

-   `$heading` is used as a reference to the major heading of the page. Use it to set your `admin` side headings. Found inside [`dashboard-layout.blade.php`](resources/views/components/dashboard/dashboard-layout.blade.php).(Admin side only)
-   `$head` is used as the `<head>` slots where you can pass all the HTML tags like `<meta>` tags for the head on each page.(Globally available)
-   `env('APP_NAME')` is used in several places, like title, footer and other important places where it makes sense. Just change the `APP_NAME` tailored to your business or leave it as the default CMS name.
-

# Browser Acess

-   `localStorage` is used to save user theme preference. Blocked to the access won't save the preference.
-   `localStorage` is used to mark selection on the admin panel. For instanc, selecting multiple posts to delete. requires localStorage.

# Email Server

-   By default, `gmail` is setup.
