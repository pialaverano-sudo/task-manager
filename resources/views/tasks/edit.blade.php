<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Task - Personal Task Manager</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #1f2937;
        }

        .header {
            background: linear-gradient(135deg, #2563eb, #4f46e5);
            color: white;
            padding: 45px 20px 75px;
        }

        .header-content {
            max-width: 900px;
            margin: auto;
        }

        .header h1 {
            margin: 0 0 10px;
            font-size: 36px;
        }

        .header p {
            margin: 0;
            opacity: 0.9;
        }

        .container {
            max-width: 900px;
            margin: -45px auto 50px;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.07);
        }

        .card h2 {
            margin-top: 0;
            margin-bottom: 25px;
            color: #111827;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
            color: #374151;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #dbe2ea;
            border-radius: 10px;
            font-size: 14px;
            background: #f8fafc;
            outline: none;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #2563eb;
            background: white;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 25px;
        }

        .button {
            border: none;
            padding: 13px 22px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
        }

        .save-button {
            background: #2563eb;
            color: white;
        }

        .save-button:hover {
            background: #1d4ed8;
        }

        .cancel-button {
            background: #e5e7eb;
            color: #374151;
        }

        .cancel-button:hover {
            background: #d1d5db;
        }

        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        @media (max-width: 600px) {
            .header h1 {
                font-size: 28px;
            }

            .card {
                padding: 20px;
            }

            .buttons {
                flex-direction: column;
            }

            .button {
                text-align: center;
            }
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="header-content">
            <h1>Edit Task</h1>
            <p>Update your task information and status.</p>
        </div>
    </header>

    <main class="container">

        <div class="card">

            <h2>Edit Task Information</h2>

            @if ($errors->any())
                <div class="error-box">
                    <strong>Please fix the following:</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tasks.update', $task->id) }}" method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="task_name">Task Name</label>

                    <input
                        type="text"
                        id="task_name"
                        name="task_name"
                        value="{{ old('task_name', $task->task_name) }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="description">Description</label>

                    <textarea
                        id="description"
                        name="description"
                    >{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>

                    <select id="status" name="status" required>
                        <option value="Pending"
                            {{ old('status', $task->status) === 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="Completed"
                            {{ old('status', $task->status) === 'Completed' ? 'selected' : '' }}>
                            Completed
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="due_date">Due Date</label>

                    <input
                        type="date"
                        id="due_date"
                        name="due_date"
                        value="{{ old('due_date', $task->due_date) }}"
                    >
                </div>

                <div class="buttons">

                    <button type="submit" class="button save-button">
                        Save Changes
                    </button>

                    <a href="{{ route('tasks.index') }}" class="button cancel-button">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </main>

</body>
</html>