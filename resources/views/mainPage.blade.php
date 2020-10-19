<!DOCTYPE html>

<html>
    <head>
    @include('components.head')
    </head>

    <!-- Book and Author Inputs --> 
    <header>
    @include('components.header')
    
    </header>  

    <section>
    @yield('section content')
    
    </section>

    <aside> </aside>

    <footer>
    @include('components.footer')
    </footer>
        
</html>