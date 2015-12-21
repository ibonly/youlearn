# youlearn

[![Build Status](https://travis-ci.org/andela-iadeniyi/youlearn.svg)](https://travis-ci.org/andela-iadeniyi/youlearn)
[![License](http://img.shields.io/:license-mit-blue.svg)](https://github.com/andela-iadeniyi/youlearn/blob/master/LICENCE)
[![Quality Score](https://img.shields.io/scrutinizer/g/andela-iadeniyi/youlearn.svg?style=flat-square)](https://scrutinizer-ci.com/g/andela-iadeniyi/youlearn)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/andela-iadeniyi/youlearn/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/andela-iadeniyi/youlearn/?branch=master)
[![Code Climate](https://codeclimate.com/github/andela-iadeniyi/youlearn/badges/gpa.svg)](https://codeclimate.com/github/andela-iadeniyi/youlearn)
[![Coverage Status](https://coveralls.io/repos/andela-iadeniyi/youlearn/badge.svg?branch=staging&service=github)](https://coveralls.io/github/andela-iadeniyi/youlearn?branch=staging)

Visit [YouLearn demo page](https://youlearn.herokuapp.com/) to view the project demo.

YouLearn is a PHP Learning Management System project that provides a platform for sharing Youtube videos that teach something people could learn.

## Usage

To download and use this project you need to have the following installed on your machine

- Composer
  Visit the [official website](https://getcomposer.org/doc/00-intro.md) for installation instructions.
- Laravel homestead
  Visit [Laravel website](http://laravel.com/docs/5.1/homestead) for installation and setup instructions.

```bash
$ git clone https://github.com/andela-iadeniyi/YouLearn
`````
to clone the repository to your working directory. This step presumes that you have git set up and running. Update your .env file to contain your database information.

Run

```bash
$ composer install
```
to pull in the project dependencies.

*Project Features

- Registration/Login
- Password reset
- Social authentication
- Profile Management(Password update, avatar upload)
- Youtube video upload
- Browse all videos
- Browse videos by category
- View single video

## Change log

Please check out [CHANGELOG](CHANGELOG.md) file for information on what has changed recently.

## Testing

``` bash
$ vendor/bin/phpunit test
```

## Contributing

To contribute and extend the scope of this package,
Please check out [CONTRIBUTING](CONTRIBUTING.md) file for detailed contribution guidelines.

## Credits

YouLearn is created and maintained by `Ibraheem ADENIYI`.


## License

YouLearn is released under the MIT Licence. See the bundled [LICENSE](LICENSE.md) file for details.
