@extends('layouts.app')

@section("content") 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <h1 class="h1"><strong>{{ $project->name }}</strong></h1>
    <a href="{{ route('gantt', ['project_id' => $project->id]) }}" class="btn btn-primary">Project Overview</a>
    <p>{{ $project->description }}</p>
    <p><strong>Due:</strong> {{ $project->deadline }}</p>

    <div style="width: 200px;">
        <canvas id="projectProgressChart"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('projectProgressChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'Remaining'],
                datasets: [{
                    label: 'Project Progress',
                    data: [{{ $project->completion_percentage }}, 100 - {{ $project->completion_percentage }}],
                    backgroundColor: ['#28a745', '#dc3545'],
                    borderWidth: 1,
                }]
            },
            options: {
                // responsive: true,
                maintainAspectRatio: false // Allows for resizing based on CSS
            }
        });
    </script>

    <h2>Tasks</h2>
    <a href="{{ route('tasks.create', ['project_id' => $project->id]) }}" class="btn btn-primary">Tambah Tugas Baru</a>

    <div class="row justify-content-start">
        @foreach($sortedTasks as $task)
            <div class="col-md-3 border rounded mt-4 mx-2 h-auto d-flex flex-column justify-content-between">
                <div class="">
                    <h3>{{ $task->title }}</h3>
                    <p>
                        {{ $task->description }}
                    </p>

                </div>
                <div class="border">
                    <p class="border">
                        <strong>Assigned To:</strong> {{ $users[$task->user_id]->name }}
                    </p>
                    <p><strong>Due:</strong> {{ ucfirst($task->due_date) }}</p>
                    <p class="border rounded m-0"><strong>Status:</strong></p>
                    <form class="border rounded" action="{{ route('tasks.updateStatus', $task) }}" method="POST">
                        @csrf
                        @method('patch')
                        <select name="status">
                            <option value="not_started" {{ $task->status == 'not_started' ? 'selected' : '' }}>Not Started
                            </option>
                            <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress
                            </option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                        <button class="btn btn-primary " type="submit">Update Status</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    @if($tasksDueSoon->isNotEmpty())
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                @foreach($tasksDueSoon as $task)
                    Swal.fire({
                        title: 'Tugas Mendekat!',
                        text: 'Ada tugas yang mendekati deadline!',
                        icon: 'warning',
                        confirmButtonText: 'Ok'
                    });
                @endforeach
            });
        </script>
    @endif


@endsection