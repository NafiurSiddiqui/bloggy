# Bloggy

A micro blogging platform 💫 with Laravel and Blade.

Made with 💚

## SEO guide

[Google Seo Best Practices](https://developers.google.com/search/docs/appearance/publication-dates?hl=en)

[Moz SEO guide](https://moz.com/beginners-guide-to-seo)

## Must Do

-   Seed the `initAppSeeder`
    -   This creates a default admin, a default `uncategorized` category, and a default `uncategorized` subcategory.
-   Show `cookies policies`, you are using sessions storage for UI functionality.

## EDITOR

-   [TinyMce](https://www.tiny.cloud/) Ediotr's free plan is used. Which allows you to load the editor 1,000 times per month.
-   `TinyMce` editor also allows you to use plugins. [visit](https://www.tiny.cloud/docs/tinymce/latest/plugins/) here in order to take a look a the number of plugins they offer.
-   We have used freemium open-source [image](https://www.tiny.cloud/docs/tinymce/latest/image/) plugin to enable image upload. **DO NOT** upload svgs, since they are vulnerable to cyber attacks.
-   [Contact Us](#) or hire a developer to upgrad any paid plans if needed.

## POST CREATION

-   You can either manually create slug or leave it up to bloggy. Bloggy generates slug for you based on your title. If you are to manually set your slug please do use `-` hyphen separated slug only.
-

## features

-   You can CRUD post, categories, subcategories.
-   Separate admin dashboard only for admins and allowed roles.
-   Commentary and reply system
-   Notfication system (queued jobs)
    -   upon comment and reply
        -   right now, notification is deleted upon clicking the `<x-notification-card>`. You can alternatively use Laravels `markAsRead()` method to keep the notifications instead and filter based on the `readNotifications()` or `unreadNotifications()`, and render cards.
    -   Admin approving admin-side registration. `/admin/registration`

## In development

-   Turn on the `shouldBeStrict`, will help you catch `n + 1` queries faster.

# In production

-   change the necessary `env` variables.
-   Turn off the `shouldBeStrict()`.
-   By default notification system is using `mail` and `database` for comment and relply.
-   Add the neccessary `mail` variable for your mail server.
-   Do run `sail artisan work:queue` to start the workers.
