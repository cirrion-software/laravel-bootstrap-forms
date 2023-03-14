# Bootstrap 5 forms for Laravel 9

This is a package for creating Bootstrap 5 styled form elements in Laravel 9.

## Features

-   Labels
-   Error messages
-   Bootstrap 5 markup and classes (including state, colors, and sizes)
-   Error validation messages
-   Form fill (using Model instance, array or after form submission when a validation error occurs)
-   Internationalization
-   Add parameters using php chaining approach
-   Zero dependences (no Laravel Collective dependency)

## Introduction

### Before

```html
<div>
    <label for="username">Username</label>
    <input
        type="text"
        class="form-control @if($errors->has('username')) is-invalid @endif "
        id="username"
        value="{{old('username', $username)}}"
    />
    @if($errors->has('username'))
    <div class="invalid-feedback">{{$errors->first('username')}}</div>
    @endif
</div>
```

### After

```php
BSForm::text('username', 'Username')
```

## Installation

#### Require the package using Composer.

```bash
composer require cirrion/laravel-bootstrap-forms
```

### Laravel Autodiscovery

The auto discovery feature will make everything for you and your job is done, you can start using now.

## Usage

### Basic form controls

#### Opening and closing a form

```php
// Opening a form using POST method

{!!BSForm::open()!!}
// ... Form components here
{!!BSForm::close()!!}
```

> Opening the form will add \_token field automatically for you

#### Inline form

```php
// Making all inputs inline
{!!BSForm::open()->formInline()!!}

// You can use FALSE to turn off disable form inline
{!!BSForm::open()->formInline(false)!!}
```

#### Fieldset

| Param    | Type   | Default | Description     |
| -------- | ------ | ------- | --------------- |
| \$legend | string | null    | Fieldset Legend |

```php
// Example
{!!BSForm::fieldsetOpen('Legend title')!!}
// ... fieldset content
{!!BSForm::fieldsetClose()!!}
```

### Basic inputs

#### Text inputs

| Param     | Type   | Default | Description   |
| --------- | ------ | ------- | ------------- |
| \$name    | string | null    | Input name    |
| \$label   | string | null    | Input label   |
| \$default | string | null    | Default value |

```php
// Example
{!!BSForm::text('name', 'User name')!!}
```

##### Textarea

| Param     | Type   | Default | Description   |
| --------- | ------ | ------- | ------------- |
| \$name    | string | null    | Input name    |
| \$label   | string | null    | Input label   |
| \$default | string | null    | Default value |

```php
// Example
{!!BSForm::textarea('description', 'Description')!!}
```

##### Select

| Param     | Type   | Default | Description    |
| --------- | ------ | ------- | -------------- |
| \$name    | string | null    | Input name     |
| \$label   | string | null    | Input label    |
| \$options | array  | []      | Select options |
| \$default | string | null    | Default value  |

```php
// Example
{!!BSForm::select('city', 'Choose your city', [1 => 'Gotham City', 2 => 'Springfield'])!!}
```

##### Options

| Param      | Type     | Default | Description   |
| ---------- | -------- | ------- | ------------- |
| \$options  | iterable | []      | Options list  |
| \$valueKey | string   | null    | key for value |
| \$idKey    | string   | null    | key for id    |

```php
// Example

// With array
{!!BSForm::select('city', 'Choose your city')->options([1 => 'Gotham City', 2 => 'Springfield'])!!}

// With collection
$cities = collect([1 => 'Gotham City', 2 => 'Springfield'])
{!!BSForm::select('city', 'Choose your city')->options($cities)!!}

// With model collection
$cities = \App\City::all();
{!!BSForm::select('city', 'Choose your city')->options($cities)!!}

// Your model should have id and name attributes. If these keys are different, you can pass second and/or third parameters (you can use the second parameter to access some model acessor, also)
$cities = \App\City::all();
{!!BSForm::select('city', 'Choose your city')->options($cities, 'city_name', 'id_object_field')!!}

// When you are using collections, you can use prepend method (https://laravel.com/docs/5.8/collections#method-prepend) to add an first empty value, like "Choose your city"
$cities = \App\City::all();
{!!BSForm::select('city', 'Choose your city')->options($cities->prepend('Choose your city', ''))!!}
```

##### Checkbox

| Param     | Type    | Default | Description   |
| --------- | ------- | ------- | ------------- |
| \$name    | string  | null    | Input name    |
| \$label   | string  | null    | Input label   |
| \$value   | string  | null    | Input value   |
| \$checked | boolean | null    | Default value |

```php
// Example
{!!BSForm::checkbox('orange', 'Orange')!!}
```

##### Radio

| Param     | Type    | Default | Description   |
| --------- | ------- | ------- | ------------- |
| \$name    | string  | null    | Input name    |
| \$label   | string  | null    | Input label   |
| \$value   | string  | null    | Input value   |
| \$checked | boolean | null    | Default value |

```php
// Example
{!!BSForm::radio('orange', 'Orange')!!}
```

##### File

| Param   | Type   | Default | Description |
| ------- | ------ | ------- | ----------- |
| \$name  | string | null    | Input name  |
| \$label | string | null    | Input label |

```php
// Example
{!!BSForm::file('doc', 'Document')!!}
```

#### Date inputs

| Param     | Type   | Default | Description   |
| --------- | ------ | ------- | ------------- |
| \$name    | string | null    | Input name    |
| \$label   | string | null    | Input label   |
| \$default | string | null    | Default value |

```php
// Example
{!!BSForm::date('birthday', 'Birthday')!!}
```

#### Tel inputs

| Param     | Type   | Default | Description   |
| --------- | ------ | ------- | ------------- |
| \$name    | string | null    | Input name    |
| \$label   | string | null    | Input label   |
| \$default | string | null    | Default value |

```php
// Example
{!!BSForm::tel('number', 'Phone number')!!}
```

#### Time inputs

| Param     | Type   | Default | Description   |
| --------- | ------ | ------- | ------------- |
| \$name    | string | null    | Input name    |
| \$label   | string | null    | Input label   |
| \$default | string | null    | Default value |

```php
// Example
{!!BSForm::time('hour', 'Meeting hour')!!}
```

#### URL inputs

| Param     | Type   | Default | Description   |
| --------- | ------ | ------- | ------------- |
| \$name    | string | null    | Input name    |
| \$label   | string | null    | Input label   |
| \$default | string | null    | Default value |

```php
// Example
{!!BSForm::urlInput('website', 'You website')!!}
```

#### Range inputs

| Param     | Type   | Default | Description   |
| --------- | ------ | ------- | ------------- |
| \$name    | string | null    | Input name    |
| \$label   | string | null    | Input label   |
| \$default | string | null    | Default value |

```php
// Example
{!!BSForm::range('name', 'User name')!!}
```

##### Hidden

| Param     | Type    | Default | Description   |
| --------- | ------- | ------- | ------------- |
| \$name    | string  | null    | Input name    |
| \$default | boolean | null    | Default value |

```php
// Example
{!!BSForm::hidden('user_id')!!}
```

##### Anchor

| Param   | Type   | Default | Description |
| ------- | ------ | ------- | ----------- |
| \$value | string | null    | Anchor text |
| \$url   | string | null    | Anchor url  |

```php
// Example
{!!BSForm::anchor("Link via parameter", 'foo/bar')!!}
```

##### Buttons

| Param   | Type   | Default | Description  |
| ------- | ------ | ------- | ------------ |
| \$value | string | null    | Button value |
| \$color | string | null    | Button color |
| \$size  | string | null    | button size  |

###### Submit

```php
// Example
{!!BSForm::submit("Send form")!!}
```

###### Button

```php
// Example
{!!BSForm::button("Do something", "warning", "lg")!!}
```

###### Reset

```php
// Example
{!!BSForm::reset("Clear form")!!}
```

### Chainable methods

> This package uses [chaining](https://en.wikipedia.org/wiki/Method_chaining) feature, allowing easly pass more parameters.

### Filling a form

| Param  | Type         | Default | Description              |
| ------ | ------------ | ------- | ------------------------ |
| \$data | object/array | array   | Data fo fill form inputs |

```php
// Examples

// With initial data using a Model instance
$user = User::find(1);
{!!BSForm::open()->fill($user)!!}

// With initial array data
$user = ['name' => 'Jesus', 'age' => 33];
{!!BSForm::open()->fill($user)!!}
```

### Url

Use in anchors and forms openings

| Param | Type   | Default | Description |
| ----- | ------ | ------- | ----------- |
| \$url | string | null    | Url         |

```php
// Example
{!!BSForm::anchor("Link via url")->url('foo/bar')!!}
```

### Route

Use in anchors and forms openings

| Param   | Type   | Default | Description |
| ------- | ------ | ------- | ----------- |
| \$route | string | null    | Route name  |

```php
// Example
{!!BSForm::anchor("Link via route")->route('home')!!}
```

### Error Bag

Use if you have more then one form per page. You set an identifier for each form, and the errors will be attached for that specific form

| Param   | Type   | Default | Description    |
| ------- | ------ | ------- | -------------- |
| \$value | string | null    | Error bag name |

```php
// Example: attach this form to a error bag called "registerErrorBag"
{!!BSForm::open()->route('register.post')->errorBag("registerErrorBag")!!}

// ------------------------------------------------------

// Now, in your controller (register.post route), you can redirect the user to a form page again, with erros inside a error bag called "registerErrorBag"
public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        // ... rules here
    ]);

    if ($validator->fails()) {
        return redirect()
            ->route('register.form')
            ->withInput()
            ->withErrors($validator, 'registerErrorBag');
    }

    // Proced to register here
}

// ------------------------------------------------------

// If your validation is on a Form Request, you can add a protected method "$errorBag" to set a ErrorBag name

class RegisterRequest extends FormRequest
{

    protected $errorBag = 'registerErrorBag';

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            // ... rules here
        ];
    }
}
```

### Errors

Show all errors inside a panel

| Param   | Type   | Default | Description |
| ------- | ------ | ------- | ----------- |
| \$title | string | null    | Panel title |

```php
// Example
{!!BSForm::errors("The form has errors")!!}
```

### Disable validation messages

Disable success/error status and validation error message

| Param      | Type    | Default | Description     |
| ---------- | ------- | ------- | --------------- |
| \$disabled | boolean | false   | Disabled status |

```php
// Example
{!!BSForm::text('username', 'User name')->disableValidation()!!}

// You can use FALSE to turn off disable validation (to enable it)
{!!BSForm::text('username', 'User name')->disableValidation(false)!!}
```

### Checked

Set the checkbox/radio checked status

| Param     | Type    | Default | Description    |
| --------- | ------- | ------- | -------------- |
| \$checked | boolean | true    | Checked status |

```php
// Examples

// Using readonly field
{!!BSForm::checkbox('agree', 'I agree')->checked()!!}

// You can use FALSE to turn off checked status
{!!BSForm::checkbox('agree', 'I agree')->checked(false)!!}
```

### Inline

Set the checkbox/radio checked status

```php
// Examples
{!!BSForm::radio('orange', 'Orange')->inline()!!}

{!!BSForm::checkbox('orange', 'Orange')->inline()!!}

// You can use FALSE to turn off inline status
{!!BSForm::checkbox('orange', 'Orange')->inline(false)!!}
```

### Placeholder

| Param         | Type   | Default | Description      |
| ------------- | ------ | ------- | ---------------- |
| \$placeholder | string | null    | Placeholder text |

```php
// Example
{!!BSForm::text('name', 'Name')->placeholder('Input placeholder')!!}
```

### Select Multiple

```php
// Example
{!!BSForm::select('city', 'Choose your city', [1 => 'Gotham City', 2 => 'Springfield'])->multiple()!!}
```

### Locale

Using locale, the package will look for a resources/lang/{CURRENT_LANG}/forms/user.php language file and uses labels and help texts as keys for replace texts

```php
// Example
{!!BSForm::open()->locale('forms.user')!!}
```

### Help Text

| Param  | Type   | Default | Description |
| ------ | ------ | ------- | ----------- |
| \$text | string | null    | Help text   |

```php
// Example
{!!BSForm::text('name', 'Name')->help('Help text here')!!}
```

### Custom attributes

| Param   | Type  | Default | Description             |
| ------- | ----- | ------- | ----------------------- |
| \$attrs | array | []      | Custom input attributes |

```php
// Example
{!!BSForm::text('name', 'Name')->attrs(['data-foo' => 'bar', 'rel'=> 'baz'])!!}
```

### Custom attributes in wrapper div (\<div class="form-group">...\</div>)

| Param   | Type  | Default | Description             |
| ------- | ----- | ------- | ----------------------- |
| \$attrs | array | []      | Custom input attributes |

```php
// Example
{!!BSForm::text('name', 'Name')->wrapperAttrs(['data-foo' => 'bar', 'id'=> 'name-wrapper'])!!}
```

### Readonly

| Param    | Type    | Default | Description      |
| -------- | ------- | ------- | ---------------- |
| \$status | boolean | true    | Read only status |

```php
// Examples

// Using readonly field
{!!BSForm::text('name', 'Name')->readonly()!!}

// You can use FALSE to turn off readonly status
{!!BSForm::text('name', 'Name')->readonly(false)!!}
```

### Disabled

| Param    | Type    | Default | Description     |
| -------- | ------- | ------- | --------------- |
| \$status | boolean | true    | Disabled status |

```php
// Examples

// Disabling a field
{!!BSForm::text('name', 'Name')->disabled()!!}

// Disabling a fieldset
{!!BSForm::fieldsetOpen('User data')->disabled()!!}

// You can use FALSE to turn off disabled status
{!!BSForm::text('name', 'Name')->disabled(false)!!}
```

### Block

| Param    | Type    | Default | Description     |
| -------- | ------- | ------- | --------------- |
| \$status | boolean | true    | Disabled status |

```php
// Examples

// Disabling a field
{!!BSForm::text('name', 'Name')->block()!!}

// You can use FALSE to turn off block status
{!!BSForm::text('name', 'Name')->block(false)!!}
```

### Required

| Param    | Type    | Default | Description     |
| -------- | ------- | ------- | --------------- |
| \$status | boolean | true    | Required status |

```php
// Examples

// Disabling a field
{!!BSForm::text('name', 'Name')->required()!!}

// Disabling a fieldset
{!!BSForm::fieldsetOpen('User data')->required()!!}

// You can use FALSE to turn off required status
{!!BSForm::text('name', 'Name')->required(false)!!}
```

### AutoFill

| Param   | Type   | Default | Description       |
| ------- | ------ | ------- | ----------------- |
| \$value | string | 'on'    | autocomplte value |

see: https://html.spec.whatwg.org/multipage/forms.html#autofill

If no autocomplete value is specified on the form, html spec requires
a default value of 'on'. So, you must explicitly turn it off.

Autocomplete values will be automatically generated for fields with
single word names matching valid values (e.g. name, email, tel, organization). The
complete list is in the spec mentioned above.

```php
// Examples

// Switch off autocomplete for the form
{!!BSForm::open()->autocomplete('off')!!}

// Explicitly set a autocomplete value
{!!BSForm::text('mobile', 'Mobile Number')->autocomplete('tel')!!}

// Disable autocomplete for fields with valid names
{!!BSForm::text('name', 'Name')->autocomplete('off')!!}
```

### Id

| Param | Type   | Default | Description |
| ----- | ------ | ------- | ----------- |
| \$id  | string | null    | Id field    |

```php
// Example
{!!BSForm::text('name', 'Name')->id('user-name')!!}
```

### Id prefix

| Param    | Type   | Default | Description |
| -------- | ------ | ------- | ----------- |
| \$prefix | string | null    | Id prefix   |

```php
// Example
{!!BSForm::open()->idPrefix('register')!!}
```

### Multipart

| Param       | Type    | Default | Description    |
| ----------- | ------- | ------- | -------------- |
| \$multipart | boolean | true    | Multipart flag |

```php
// Examples
{!!BSForm::open()->multipart()!!}

// You can use FALSE to turn off multipart
{!!BSForm::open()->multipart(false)!!}
```

### Method

| Param    | Type   | Default | Description |
| -------- | ------ | ------- | ----------- |
| \$method | string | null    | HTTP method |

```php
// Examples
{!!BSForm::open()->method('get')!!}
{!!BSForm::open()->method('post')!!}
{!!BSForm::open()->method('put')!!}
{!!BSForm::open()->method('patch')!!}
{!!BSForm::open()->method('delete')!!}
```

### explicit HTTP verbs

```php
// Examples
{!!BSForm::open()->get()!!}
{!!BSForm::open()->post()!!}
{!!BSForm::open()->put()!!}
{!!BSForm::open()->patch()!!}
{!!BSForm::open()->delete()!!}
```

### Color

| Param   | Type   | Default | Description |
| ------- | ------ | ------- | ----------- |
| \$color | string | null    | Color name  |

```php
// Examples
{!!BSForm::button("Do something")->color("warning")!!}

{!!BSForm::button("Do something")->color("primary")!!}
```

### explicit color

```php
// Examples
{!!BSForm::button("Button label")->warning()!!}
{!!BSForm::button("Button label")->outline()!!}
{!!BSForm::button("Button label")->success()!!
{!!BSForm::button("Button label")->danger()!!}
{!!BSForm::button("Button label")->secondary()!!}
{!!BSForm::button("Button label")->info()!!}
{!!BSForm::button("Button label")->light()!!}
{!!BSForm::button("Button label")->dark()!!}
{!!BSForm::button("Button label")->link()!!}
```

### Size

| Param  | Type   | Default | Description |
| ------ | ------ | ------- | ----------- |
| \$size | string | null    | Size name   |

```php
// Examples
{!!BSForm::button("Do something")->size("sm")!!}

{!!BSForm::button("Do something")->size("lg")!!}
```

### Explicit size

```php
// Examples
{!!BSForm::button("Button label")->sm()!!}
{!!BSForm::button("Button label")->lg()!!}
```

### Type

| Param  | Type   | Default | Description |
| ------ | ------ | ------- | ----------- |
| \$type | string | null    | Type field  |

```php
// Examples

// Password field
{!!BSForm::text('password', 'Your password')->type('password')!!}

// Number field
{!!BSForm::text('age', 'Your age')->type('number')!!}

// Email field
{!!BSForm::text('email', 'Your email')->type('email')!!}
```

### Min

| Param   | Type   | Default | Description   |
| ------- | ------ | ------- | ------------- |
| \$value | number | null    | Minimum value |

Set min attribute for input

```php
// Example
{!!BSForm::text('age', 'Your age')->type('number')->min(18)!!}
```

### Max

| Param   | Type   | Default | Description   |
| ------- | ------ | ------- | ------------- |
| \$value | number | null    | Minimum value |

Set max attribute for input

```php
// Example
{!!BSForm::text('age', 'Your age')->type('number')->max(18)!!}
```

### Name

| Param  | Type   | Default | Description |
| ------ | ------ | ------- | ----------- |
| \$name | string | null    | Input name  |

```php
// Examples
{!!BSForm::text('text')->name('name')!!}
```

### Label

| Param   | Type   | Default | Description |
| ------- | ------ | ------- | ----------- |
| \$label | string | null    | Input label |

```php
// Examples
{!!BSForm::text('age')->label('Your age')!!}
```

### Default Value

| Param   | Type  | Default | Description |
| ------- | ----- | ------- | ----------- |
| \$value | mixed | null    | Input value |

```php
// Example
{!!BSForm::text('name', 'Your name')->value('Maria')!!}
```

### Render

| Param    | Type   | Default | Description |
| -------- | ------ | ------- | ----------- |
| \$render | string | null    | Render name |

```php
// Examples

// Number field
{!!BSForm::render('text')->name('age')->label('Your age')!!}
```

### Disable is-valid CSS Class

| Param            | Type    | Default | Description                |
| ---------------- | ------- | ------- | -------------------------- |
| \$disableIsValid | boolean | true    | Disable is-valid CSS class |

```php
// Examples

// Disable Bootstrap's is-valid CSS class
{!!BSForm::text('name', 'Name')->disableIsValid()!!}
```

### Chaining properties

You can use chaining feature to use a lot of settings for each component

```php
// Examples

{!!BSForm::open()->locale('forms.user')->put()->multipart()->route('user.add')->data($user)!!}

{!!BSForm::text('name', 'Name')->placeholder('Type your name')->lg()!!}

{!!BSForm::anchor("Link as a button")->sm()->info()->outline()!!}

{!!BSForm::submit('Awesome button')->id('my-btn')->disabled()->danger()->lg()!!}

{!!BSForm::close()!!}
```

[ico-version]: https://img.shields.io/packagist/v/netojose/laravel-bootstrap-4-forms.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/netojose/laravel-bootstrap-4-forms.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/netojose/laravel-bootstrap-4-forms
[link-downloads]: https://packagist.org/packages/netojose/laravel-bootstrap-4-forms
