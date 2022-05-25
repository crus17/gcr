<?php
	if (Auth::user()->dashboard_style == "light") {
		$bgmenu="blue";
    $bg="light";
    $text = "dark";
} else {
    $bgmenu="dark";
    $bg="dark";
    $text = "light";
}
?>
@extends('layouts.app')
    @section('content')
        @include('user.topmenu')
        @include('user.sidebar')
        <div class="main-panel bg-{{$bg}}">
			<div class="content bg-{{$bg}}">
				<div class="page-inner">
					<div class="row mb-5">
						<div class="col text-center card bg-{{$bg}} p-3">
							<h1 class="title1 text-{{$text}}">{{$settings->site_name}} Support</h1>
							<div class="sign-up-row widget-shadow text-{{$text}}">
								<h4 class="text-{{$text}}">For inquiries, suggestions or complains. Mail us at</h4>
								<h5 class="text-{{$text}} mt-3">{{$settings->contact_email}}
							</div>
						</div>
					</div>
				</div>
			</div>
    @endsection