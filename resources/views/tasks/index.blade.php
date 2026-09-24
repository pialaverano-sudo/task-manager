<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Personal Task Manager</title>

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
            max-width: 1100px;
            margin: auto;
        }

        .header h1 {
            margin: 0 0 10px;
            font-size: 36px;
        }

        .header p {
            margin: 0;
            opacity: 0.9;
            font-size: 16px;
        }

        .container {
            max-width: 1100px;
            margin: -45px auto 50px;
            padding: 0 20px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.07);
        }

        .stat-label {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .stat-number {
            font-size: 30px;
            font-weight: bold;
            color: #1e293b;
        }

        .card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            margin-bottom: 25px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.07);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .card-header h2 {
            margin: 0;
            font-size: 22px;
            color: #111827;
        }

        .card-header span {
            color: #64748b;
            font-size: 14px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full-width {
            grid-column: 1 / -1;
        }

        label {
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
            transition: 0.2s;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #2563eb;
            background: white;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        textarea {
            min-height: 110px;
            resize: vertical;
        }

        .button {
            margin-top: 22px;
            width: 100%;
            border: none;
            padding: 14px;
            border-radius: 10px;
            background: #2563eb;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .button:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .error-box {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .task-list {
            display: grid;
            gap: 14px;
        }

        .task {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 20px;
            background: #fafcff;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .task-info {
            flex: 1;
        }

        .task-name {
            font-size: 17px;
            font-weight: bold;
            margin-bottom: 7px;
            color: #111827;
        }

        .task-description {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .task-date {
            font-size: 13px;
            color: #64748b;
        }

        .task-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .status {
            align-self: flex-start;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: bold;
            white-space: nowrap;
        }

        .pending {
            background: #fef3c7;
            color: #92400e;
        }

        .completed {
            background: #dcfce7;
            color: #166534;
        }

        .action-button {
            border: none;
            padding: 7px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .edit-button {
            background: #dbeafe;
            color: #1d4ed8;
        }

        .edit-button:hover {
            background: #bfdbfe;
        }

        .delete-button {
            background: #fee2e2;
            color: #b91c1c;
        }

        .delete-button:hover {
            background: #fecaca;
        }

        .status-select {
            width: auto;
            padding: 7px 10px;
            border-radius: 8px;
            font-size: 12px;
            background: white;
        }

        .delete-form,
        .status-form {
            margin: 0;
        }

        .empty {
            text-align: center;
            padding: 35px 20px;
            color: #94a3b8;
        }

        .empty-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 13px;
            padding: 10px;
        }

        @media (max-width: 800px) {
            .task {
                flex-direction: column;
            }

            .task-actions {
                width: 100%;
            }
        }

        @media (max-width: 700px) {
            .header h1 {
                font-size: 28px;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: auto;
            }

            .card {
                padding: 20px;
            }

            .task-actions {
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>

    <header class="header">
        <div class="header-content">
            <h1>Personal Task Manager</h1>
            <p>Organize your tasks, track your progress, and stay productive.</p>
        </div>
    </header>

    <main class="container">

        @php
            $totalTasks = $tasks->count();
            $completedTasks = $tasks->where('status', 'Completed')->count();
            $pendingTasks = $tasks->where('status', 'Pending')->count();
        @endphp

        <section class="stats">

            <div class="stat-card">
                <div class="stat-label">Total Tasks</div>
                <div class="stat-number">{{ $totalTasks }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Pending</div>
                <div class="stat-number">{{ $pendingTasks }}</div>
            </div>

            <div class="stat-card">
                <div class="stat-label">Completed</div>
                <div class="stat-number">{{ $completedTasks }}</div>
            </div>

        </section>

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

        <section class="card">

            <div class="card-header">
                <div>
                    <h2>Add New Task</h2>
                    <span>Create a task and keep track of your progress.</span>
                </div>
            </div>

            <form action="{{ route('tasks.store') }}" method="POST">

                @csrf

                <div class="form-grid">

                    <div class="form-group full-width">
                        <label for="task_name">Task Name</label>

                        <input
                            type="text"
                            id="task_name"
                            name="task_name"
                            placeholder="e.g. Finish Laravel project"
                            value="{{ old('task_name') }}"
                            required
                        >
                    </div>

                    <div class="form-group full-width">
                        <label for="description">Description</label>

                        <textarea
                            id="description"
                            name="description"
                            placeholder="Describe what needs to be done..."
                        >{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>

                        <select id="status" name="status" required>
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="due_date">Due Date</label>

                        <input
                            type="date"
                            id="due_date"
                            name="due_date"
                            value="{{ old('due_date') }}"
                        >
                    </div>

                </div>

                <button type="submit" class="button">
                    + Add Task
                </button>

            </form>

        </section>

        <section class="card">

            <div class="card-header">
                <div>
                    <h2>My Tasks</h2>
                    <span>Your current task list.</span>
                </div>
            </div>

            @if ($tasks->count() > 0)

                <div class="task-list">

                    @foreach ($tasks as $task)

                        <div class="task">

                            <div class="task-info">

                                <div class="task-name">
                                    {{ $task->task_name }}
                                </div>

                                @if ($task->description)
                                    <div class="task-description">
                                        {{ $task->description }}
                                    </div>
                                @endif

                                @if ($task->due_date)
                                    <div class="task-date">
                                        📅 Due: {{ $task->due_date }}
                                    </div>
                                @endif

                            </div>

                            <div class="task-actions">

                                <span class="status {{ $task->status === 'Completed' ? 'completed' : 'pending' }}">
                                    {{ $task->status }}
                                </span>

                                <a
                                    href="{{ route('tasks.edit', $task->id) }}"
                                    class="action-button edit-button"
                                >
                                    Edit
                                </a>

                                <form
                                    action="{{ route('tasks.destroy', $task->id) }}"
                                    method="POST"
                                    class="delete-form"
                                    onsubmit="return confirm('Are you sure you want to delete this task?');"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="action-button delete-button">
                                        Delete
                                    </button>
                                </form>

                                <form
                                    action="{{ route('tasks.status', $task->id) }}"
                                    method="POST"
                                    class="status-form"
                                >
                                    @csrf
                                    @method('PATCH')

                                    <select
                                        name="status"
                                        onchange="this.form.submit()"
                                        class="status-select"
                                    >
                                        <option
                                            value="Pending"
                                            {{ $task->status === 'Pending' ? 'selected' : '' }}
                                        >
                                            Pending
                                        </option>

                                        <option
                                            value="Completed"
                                            {{ $task->status === 'Completed' ? 'selected' : '' }}
                                        >
                                            Completed
                                        </option>
                                    </select>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="empty">

                    <div class="empty-icon">📝</div>

                    <strong>No tasks yet</strong>

                    <p>Add your first task above to get started.</p>

                </div>

            @endif

        </section>

        <div class="footer">
            Personal Task Manager • Laravel
        </div>

    </main>

</body>
</html>