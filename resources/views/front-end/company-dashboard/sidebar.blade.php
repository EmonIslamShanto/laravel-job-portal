<div class="col-lg-3 col-md-4 col-sm-12">
    <div class="box-nav-tabs nav-tavs-profile mb-5">
        <ul class="nav" role="tablist">
            <li><a class="btn btn-border mb-20 {{ setSidebarActive(['company.dashboard.*']) }}" href="{{ route('company.dashboard') }}">Dashboard</a></li>
            <li><a class="btn btn-border mb-20 {{ setSidebarActive(['company.profile']) }}" href="{{ route('company.profile') }}">My Profile</a></li>
            <li><a class="btn btn-border mb-20 {{ setSidebarActive(['company.orders.*']) }}" href="{{ route('company.orders.index') }}">Orders</a></li>
            <li><a class="btn btn-border mb-20 {{ setSidebarActive(['company.jobs.*']) }}" href="{{ route('company.jobs.index') }}">Jobs</a></li>
            <li><a class="btn btn-border mb-20" href="candidate-profile-save-jobs.html">Saved Jobs</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-border mb-20"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                        href="{{ route('logout') }}">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</div>
