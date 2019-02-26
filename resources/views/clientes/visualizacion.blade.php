
@extends('layouts.master')

@foreach ($ListClients as $value)
    <p>This {{ $value }}</p>
@endforeach
