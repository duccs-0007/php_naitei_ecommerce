<?php
use App\Enums\OrderStatus;

return [

    OrderStatus::class => [
        OrderStatus::Pending => 'Pending',
        OrderStauts::Accepted => 'Accepted',
        OrderStatus::Rejected => 'Rejected'
    ]
];
