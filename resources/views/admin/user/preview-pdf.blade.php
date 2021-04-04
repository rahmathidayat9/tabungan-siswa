<!DOCTYPE html>
<html>
<head>
    <title>GENERATE PDF</title>
</head>
<body>
<br><br>
<table style="" border="1" cellspacing="0" cellpadding="10" width="100%">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Level</th>
    </tr>
  </thead>
  <tbody>
    @php
        $no=1
    @endphp
    @foreach($users as $user)
    <tr>
      <th scope="row">{{ $no++ }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->username }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->level }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
</body>
</html>