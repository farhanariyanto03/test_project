@extends('page.layout.index')

@section('title', 'Edit User')

@section('content')
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Edit User</h2>
                <p class="mt-1 text-sm text-slate-500">Perbarui data user</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200">
            <div class="p-6">
                @include('page.admin.user.partials.form')
            </div>
        </div>
    </div>
@endsection
