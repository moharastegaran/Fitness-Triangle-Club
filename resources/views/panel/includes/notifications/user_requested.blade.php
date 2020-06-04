<div class="dropdown-item">
    <a href="{{ route('panel.requests.index',['mark_as_read'=>1]) }}">
        <div class="media">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                 stroke-linejoin="round" class="feather feather-book">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                <line x1="16" y1="8" x2="16" y2="14"></line>
                <line x1="20" y1="11" x2="13" y2="11"></line>
            </svg>
            <div class="media-body">
                <div class="notification-para">
                    <span class="user-name">{{ $notification->data['user'] }}</span>
                    درخواست برنامه
                    {{ $notification->data['program'] }}
                    داد.
                </div>
            </div>
        </div>
    </a>
</div>