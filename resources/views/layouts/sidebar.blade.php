<div class="card">
    <div class="card-body">
        <div class="d-flex flex-column flex-shrink-0 p-3">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link link-body-emphasis">
                        <i class="fas fa-dashboard"></i>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('employees.index') }}" class="nav-link link-body-emphasis">
                        <i class="fas fa-users"></i>
                        Employees
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('attendances.index') }}" class="nav-link link-body-emphasis">
                        <i class="fas fa-calendar-days"></i>
                        Attendances
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('holidays.index') }}" class="nav-link link-body-emphasis">
                        <i class="fas fa-person-walking-arrow-right"></i>
                        Holiday Requests
                    </a>
                </li>
            </ul>
        </div>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
               data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://cdn.pixabay.com/photo/2021/03/11/07/37/man-6086415_1280.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>
                    {{ auth()->user()->name }}
                </strong>
            </a>
            <ul class="dropdown-menu text-small shadow">
                <li>
                    <a class="dropdown-item" href="#"
                        onclick="
                            event.preventDefault();
                            document.getElementById('logoutForm').submit();
                        "
                    >Sign out</a>
                </li>
            </ul>
            <form action="{{ route('logout') }}" id="logoutForm" method="POST">
                @csrf
            </form>
        </div>
    </div>
</div>