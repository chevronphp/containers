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

# usage

If there isn't an examples dir, look through the tests.

# installation

Using [composer](http://getcomposer.org/) `"require" : { "henderjon/chevron-containers": "~3.0" }`

# license

See LICENSE.md for the [BSD-3-Clause](http://opensource.org/licenses/BSD-3-Clause) license.

## links

  - The [Packagist archive](https://packagist.org/packages/henderjon/chevron-containers)
  - Reading on [Semantic Versioning](http://semver.org/)
  - Reading on [Composer Versioning](https://getcomposer.org/doc/01-basic-usage.md#package-versions)

### cool kids badges

#### travis

[![Build Status](https://travis-ci.org/henderjon/chevron.containers.svg?branch=master)](https://travis-ci.org/henderjon/chevron.containers)

#### scruitinizer

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/henderjon/chevron.containers/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/henderjon/chevron.containers/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/henderjon/chevron.containers/badges/build.png?b=master)](https://scrutinizer-ci.com/g/henderjon/chevron.containers/build-status/master)
[![Code Coverage](https://scrutinizer-ci.com/g/henderjon/chevron.containers/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/henderjon/chevron.containers/?branch=master)