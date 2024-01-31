<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Announcement</title>

    @vite('resources/css/app.css')
</head>
<!-- resources/views/admin/create_announcement.blade.php -->

<body>
    <div class="bg-slate-50">
        <div class="grid grid-cols-1 lg:grid-cols-[250px,1fr]">

            <!-- Left column (navigation bar) -->
            <div class="bg-slate-50 p-4 text-blue-950 font-nun">
                <nav class="flex flex-col items-center">
                    <img src="{{ asset('/storage/svg/logo.svg') }}" alt="CO-Z" class="mb-11 mt-10">
                    <a href="#" class="mb-6 text-center text-blue-950 font-bold border border-transparent rounded-full py-2 w-48 hover:border-slate-200">Dashboard</a>
                    <a href="#" class= "mb-6 text-center text-blue-950 font-bold border border-transparent rounded-full py-2 w-48 hover:border-slate-200">New Property</a>
                    <a href="{{ route ('admin.announcement')}}" class="mb-6 text-center border border-grey-200 rounded-full py-2 w-48 text-blue-950 font-bold hover:border-slate-200 shadow-lg">Anouncement</a>
                    <a href="{{ route('categories.index') }}" class="mb-6 text-center text-blue-950 font-bold border border-transparent rounded-full py-2 w-48 hover:border-slate-200">Category</a>
                    <a href="#" class="mb-6 text-center text-blue-950 font-bold border border-transparent rounded-full py-2 w-48 hover:border-slate-200">User List</a>
                </nav>
            </div>

            <!-- Right column container -->
            <div class="h-screen bg-white rounded-3xl p-4 grid lg:grid-rows-[92px,repeat(3,60px)]">
                <x-admin-comp.header-comp />

  <h1 class="text-2xl font-bold mb-4">Create Announcement</h1>

  @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
      <strong class="font-bold">Success!</strong>
      <span class="block sm:inline">{{ session('success') }}</span>
    </div>
  @endif

  <form action="{{ route('announcement.announcements.store') }}" method="POST" class="space-y-4">
    @csrf
    <div class="mb-4">
      <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
      <input type="text" name="title" id="title" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline" required>
    </div>
    <div class="mb-6">
      <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content:</label>
      <textarea name="content" id="content" class="appearance-none border rounded w-full py-2 px-3 leading-tight focus:outline-none focus:shadow-outline resize-none" rows="5" required></textarea>
    </div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Announcement</button>
  </form>

  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</body>


</html>
