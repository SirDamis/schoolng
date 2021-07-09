<x-layout>
	<div class="container mt-3">
        <div>
            <p>Do you want to start a learning group? Click on the <a href="#"  data-bs-toggle="modal" data-bs-target="#modalForm">link </a> to ceate your group </p>

            <!-- Modal -->
            <div class="modal fade" id="modalForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create a Learning Groups</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="post">
                                <div class="mb-3">
                                    <label class="form-label">Group Name</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Course Type  </label>

                                      <select class="btn btn-secondary dropdown-toggle">
                                        <option value="Free" selected>Free</option>
                                        <option value="Paid">Paid</option>
                                    </select>
                                </div>
                        
                                <div class="modal-footer d-block">
                                    <button type="submit" class="btn btn-warning float-end">Create Group</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		



        <div>
            @if($group_details->count())
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Group Name</th>
                            <th scope="col">Creator Username</th>
                            <th scope="col">____</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($group_details as $group_detail)
                        <tr>
                          <th scope="row">{{ $loop->iteration }}</th>
                          <td>{{ $group_detail->group_name }}</td>
                          <td>{{ $group_detail->creator->username }}</td>
                          <td><a href="#">Join Group</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <div>
                    No group to show.
                </div>
            @endif
        </div>

	</div>
</x-layout>