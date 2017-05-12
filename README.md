https://techpunch.co.uk/development/render-string-twig-template-symfony2

How to work with MjmlBundle

First install the bundle

```
composer require Elephantly/MjmlBundle
```

Then your controller can extand MJMLController which makes you access 2 functions:

- render()

- renderView()

Render will allow you to render your mjml view in a response

RenderView will return a string to use however you want

Enjoy :)
