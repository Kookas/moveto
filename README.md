# MoveToBundle
MoveToBundle for Symfony and Twig lets you generate paths to routes by copying all the parameters of the current route and applying them to another route with the option of modifying all or only some of those parameters. No more extremely long ```path()``` calls!

To install, use ```composer require kookas/movetobundle``` and then insert the line ```new Kookas\MoveToBundle\KookasMoveToBundle()``` into your ```AppKernel.php``` file. Alternatively, you can simply download the bundle straight from the repository and use that.

To use, call the Twig function ```moveTo(params, route = null)```. This will generate a path from the current route parameters combined with the parameters provided in the first argument, with your parameters taking precedence where conflicts arise. By default, the route used is the current route, but you can specify a different one by name in the second argument.

For example, suppose I have a blog system that lets any user set up a blog and make blog posts, which can then have paginated comments. The URI for the comments of a blog post might look like this:

``` /blogs/myblog/top-10-healthy-foods-in-existence/comments/page-1 ```

If I want to make a button to go to page-2, not only would I normally have to specify the current route again, but I'd also have to respecify both the blog name and the post slug in ```path()```. With MoveToBundle, you can just do this:

```{{ moveTo({'page':2}) }}```
