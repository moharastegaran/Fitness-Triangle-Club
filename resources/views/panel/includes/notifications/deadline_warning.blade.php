<div class="item-timeline  timeline-{{ $notification->data['is_wp'] ?  'warning' : 'danger'}}">
    <div class="t-dot" data-original-title="">
    </div>
    <div class="t-text">
        <p>

            {{ toFaDigits($notification->data['diff']) }}
            روز تا اتمام
            <a href="{{ route('panel.'.($notification->data['is_wp'] ? 'workout' : 'nutrition').'-programs.show',$notification->data['program']['id']) }}">
                برنامه
                {{ ($notification->data['is_wp']) ? 'تمرینی' : 'غذایی' }}
                {{ $notification->data['user']['name'].' '.$notification->data['user']['family'] }}
            </a>
             باقی‌مانده‌است
        </p>
        <p class="t-time">{{ toFaDigits(\Morilog\Jalali\Jalalian::forge($notification->created_at)->ago()) }}</p>
    </div>
</div>