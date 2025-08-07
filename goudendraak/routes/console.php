<?php
use Illuminate\Support\Facades\Schedule;

Schedule::command('sales:email-daily-summary')->daily();