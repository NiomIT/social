<style>
    .bgt {
        background-image: url({{ asset('upload/1.png') }});

        /* background-color: #75B3E6;
    color:white */
    }

    .bgttext {

        color: white;
    }

    .bgtc {

        background-color: red;
    }
</style>

<div class="sidebar-wrapper bgt" data-simplebar="true">
    <div class="sidebar-header bgt">
        <div>
            <img src="{{ asset(setting('favicon_icon')) }}" class="logo-icon bgtc" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text bgttext">{{ setting('site_title') }}</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left bgttext'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="/admin/dashboard">
                <div class="parent-icon"><i class='bx bx-cookie bgttext'></i>
                </div>
                <div class="menu-title bgttext">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle bgttext'></i>
                </div>
                <div class="menu-title bgttext">Advertisement</div>
            </a>
            <ul>
                <li> <a href="{{ route('advertisement.index') }}"><i class="bx bx-right-arrow-alt"></i>All
                        Advertisement</a>
                </li>
                <li> <a href="{{ route('advertisement.create') }}"><i class="bx bx-right-arrow-alt"></i>Add
                        Advertisement</a>
                </li>

            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle bgttext'></i>
                </div>
                <div class="menu-title bgttext">Category</div>
            </a>
            <ul>
                <li> <a href="{{ route('category.index') }}"><i class="bx bx-right-arrow-alt"></i>All Category</a>
                </li>
                <li> <a href="{{ route('category.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Category</a>
                </li>
                <li> <a href="{{ route('subcategory.index') }}"><i class="bx bx-right-arrow-alt"></i>All Sub
                        Category</a>
                </li>
                <li> <a href="{{ route('subcategory.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Sub
                        Category</a>
                </li>
            </ul>
        </li>


        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle bgttext'></i>
                </div>
                <div class="menu-title bgttext">Post</div>
            </a>
            <ul>
                <li> <a href="{{ route('post.index') }}"><i class="bx bx-right-arrow-alt"></i>All Post</a>
                </li>
                <li> <a href="{{ route('post.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Post</a>
                </li>
                <li> <a href="{{ route('post.trash') }}"><i class="bx bx-right-arrow-alt"></i>Trash Post</a>
                </li>
                <li> <a href="{{ route('post.archive') }}"><i class="bx bx-right-arrow-alt"></i>Archive Post</a>
                </li>

            </ul>
        </li>

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle bgttext'></i>
                </div>
                <div class="menu-title bgttext">Subscriber</div>
            </a>
            <ul>


            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle bgttext'></i>
                </div>
                <div class="menu-title bgttext">Poll Voting</div>
            </a>
            <ul>
                <li> <a href="{{ route('poll.index') }}"><i class="bx bx-right-arrow-alt"></i>All Poll</a>
                </li>
                <li> <a href="{{ route('poll.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Poll</a>
                </li>


            </ul>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-circle bgttext'></i>
                </div>
                <div class="menu-title bgttext">Event</div>
            </a>
            <ul>
                <li> <a href="{{ route('event.index') }}"><i class="bx bx-right-arrow-alt"></i>All Event</a>
                </li>
                <li> <a href="{{ route('event.create') }}"><i class="bx bx-right-arrow-alt"></i>Add Evet</a>
                </li>


            </ul>
        </li>




        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-line-chart bgttext"></i>
                </div>
                <div class="menu-title bgttext">Setting</div>
            </a>
            <ul>
                <li> <a href="{{ route('general.setting') }}"><i class="bx bx-right-arrow-alt"></i>General Setting</a>
                </li>
            </ul>
        </li>




    </ul>
    <!--end navigation-->
</div>
