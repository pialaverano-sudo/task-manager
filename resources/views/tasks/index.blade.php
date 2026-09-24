<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
        }

        .add-task {
            background: #f8f9fa;
            padding: 20px;
            margin-bottom: 30px;
            border-radius: 8px;
        }

        input, textarea, select, button {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #2563eb;
            color: white;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Personal Task Manager</h1>

    <div class="add-task">
        <h2>Add New Task</h2>

        <form action="{{ route('tasks.store') }}" method="POST">    
        @csrf
            <label>Task Name</label>
            <input type="text" name="task_name" placeholder="Enter task name">

            <label>Description</label>
            <textarea name="description" placeholder="Enter task description"></textarea>

            <label>Status</label>
            <select name="status">
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>

            <label>Due Date</label>
            <input type="date" name="due_date">

            <button type="submit">Add Task</button>
        </form>
    </div>

    <h2>My Tasks</h2>

    <table>
        <thead>
            <tr>
                <th>Task</th>
                <th>Description</th>
                <th>Status</th>
                <th>Due Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($tasks as $task)

                <tr>
                    <td>{{ $task->task_name }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>
                        Edit | Delete
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="5">No tasks yet.</td>
                </tr>

            @endforelse
        </tbody>
    </table>

</div>

</body>
</html>