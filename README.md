# chevron.containers

Containers is a simple implementation of a registry pattern. The
base container takes values and returns them, the deferred container is built
to handle callables, and the reference container is meant to handle maps--wait
for it--by reference.

Containers started as a pretty basic set of registry objects because you end up
using them everywhere. Deferred, however, ended up making a pretty good simple
DI container. But "Deferred" isn't as intuitive as "Di", which is why there is
a DiInterface (for typehints) and a ServiceLoader for creating and populating
the Di.

Peruse the tests or, if present, the examples directory to see usage.

See [packagist](https://packagist.org/packages/chevron/containers) for version/installation info. At the moment, I recommend using `"chevron/containers":"~4.0"`.

[![Latest Stable Version](https://poser.pugx.org/chevron/containers/v/stable.svg)](https://packagist.org/packages/chevron/containers)
[![Build Status](https://travis-ci.org/chevronphp/containers.svg?branch=master)](https://travis-ci.org/chevronphp/containers)