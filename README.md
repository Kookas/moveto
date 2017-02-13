# MoveToBundle
MoveToBundle for Symfony and Twig lets you generate paths to routes by copying all the parameters of the current route and applying them to another route with the option of modifying all or only some of those parameters. No more extremely long ```path()``` calls!

To install, use ```composer require kookas/movetobundle``` and then insert the line ```new Kookas\MoveToBundle\KookasMoveToBundle()``` into your ```AppKernel.php``` file. Alternatively, you can simply download the bundle straight from the repository and use that.

To use, call the Twig function ```moveTo(params, route = null)```. This will generate a path from the current route parameters combined with the parameters provided in the first argument, with your parameters taking precedence where conflicts arise. By default, the route used is the current route, but you can specify a different one by name in the second argument.