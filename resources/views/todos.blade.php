<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>シンプルTODOリスト</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">シンプルTODOリスト</h1>

        <!-- タスク追加フォーム -->
        <form action="/todos" method="POST" class="mb-4">
            @csrf
            <div class="input-group">
                <input type="text" name="title" class="form-control" placeholder="新しいタスクを入力" required>
                <button type="submit" class="btn btn-primary">追加</button>
            </div>
        </form>

        <!-- タスク一覧 -->
        <ul class="list-group">
            @foreach ($todos as $todo)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <form action="/todos/{{ $todo->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-sm {{ $todo->completed ? 'btn-success' : 'btn-secondary' }}">
                                {{ $todo->completed ? '完了' : '未完了' }}
                            </button>
                        </form>
                        <span class="ms-2 {{ $todo->completed ? 'text-decoration-line-through' : '' }}">
                            {{ $todo->title }}
                        </span>
                    </div>
                    <form action="/todos/{{ $todo->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">削除</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
