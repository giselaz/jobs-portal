@extends('errors.layout')

@section('code', '401')
@section('title', 'Unauthorized')
@section('message', 'You must sign in to access this page.')

@section('action_url', route('auth.create'))
@section('action_text', 'Sign in')
