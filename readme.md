# Tea Time

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

> **Note:** This was presented at Dallas PHP meetup as an application architecture
exploration and excercise to spark some conversation.

You are working on a project, perhaps one that is a bit bigger than you've ever
built before or has a unique business problem to solve. It's not so simple in
other words. You've installed the framework of your choice, you've read the docs
on how to structure your app but something just still doesn't feel right. You
ask yourself, where do I put this code? It's not a model, it's not a controller,
and you know better than putting it in the view. But still the question remains,
where does it all go?

In this meetup, we'll explore a not-so-trivial application problem and take a
look at where everything could go. We'll discuss the pros and cons of various
architectures with the goal of finding the most optimal structure for your
applications. The talk is one part soft talk and one part hard decision making
about where everything should go. There will be plenty of opportunity for Q&A.
The only harder problem to then solve should be, _What Do I Name It?_ We'll save
that for another day...

## What We Will Solve, Together

You go into the coffee shop to order tea, because you don't like coffee but
there aren't many tea shops available with good Wifi. You ask the barista for
a tea recommendation and they ask you one of a few questions:

- What kind of tea do you like?
- How much time do you have?
- Do you want a caffeine fix?
- How hot do you like your tea?

They have a limited selection of available teas so the answer to any of these
questions further constrains the choice down to one or two teas. You make your
selection and the tea is prepared to be steeped at just the right temperature
and for just the right amount of time. A great cup of tea is on it's way.

## What We Will Learn, Together

Throughout the discussion we will explore many concrete examples of where things
could go within a framework. We will use Laravel since it provides a good clean
slate with plenty of good, documented recommendation out of the box. Some of the
architecture challenges we will explore however leave the developer guessing as
even this framework does not make a clear suggestion to the developer. Some of
these design challenges will be:

- Step 1: Base Install
- Step 2: Starting Off With Model-View-Controller
- Step 3: Using API-first Design Approach
- Step 4: Making of Fat Models and Skinny Controllers
- Step 5: Introducing the Repository Pattern
- Step 6: Breaking Applications Up Into Services
- Solving Domain Problems With Domain Objects
- Slicing Up the Application Layers
- Expanding With Events and CQRS

Depending on the needs of your application, you will find something of value in
each of these approaches and can begin immediately making strides to solve the
age old developer question of, _Where Does It All Go?_
