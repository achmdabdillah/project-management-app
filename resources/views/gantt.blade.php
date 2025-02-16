@extends('layouts.app')
@section("content") 
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Project 2</title>
        <!-- Include Frappe Gantt CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/frappe-gantt/0.5.0/frappe-gantt.css">
    </head>

    <body>
        <div class="container">
            <h1 class="h1">Project 2</h1>
            <!-- This div will hold the Gantt chart -->
            <div id="gantt"></div>
        </div>

        <!-- Include Frappe Gantt JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/frappe-gantt/0.5.0/frappe-gantt.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Sample tasks for the Gantt chart
                var tasks = [
                    {
                        id: 'Task 1',
                        name: 'Design Phase',
                        start: '2025-02-01',
                        end: '2025-02-05',
                        progress: 50,
                        dependencies: ''
                    },
                    {
                        id: 'Task 2',
                        name: 'Development Phase',
                        start: '2025-02-06',
                        end: '2025-02-10',
                        progress: 20,
                        dependencies: 'Task 1'
                    },
                    {
                        id: 'Task 3',
                        name: 'Testing Phase',
                        start: '2025-02-11',
                        end: '2025-02-15',
                        progress: 0,
                        dependencies: 'Task 2'
                    }
                ];

                // Initialize the Gantt chart
                var gantt = new Gantt("#gantt", tasks, {
                    view_mode: 'Day', // you can change this to 'Week', 'Month', etc.
                    language: 'en'
                });
            });
        </script>
        <a href="{{ route('projects.index') }}" class="btn btn-primary">Back</a>
    </body>

    </html>
@endsection