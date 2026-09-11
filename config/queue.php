<?php

return [
    'default' => env('QUEUE_CONNECTION', 'sync'),
    'connections' => ['sync' => ['driver' => 'sync']],
    'batching' => ['database' => env('DB_CONNECTION', 'sqlite'), 'table' => 'job_batches', 'update_batch_at' => true],
    'failed' => ['driver' => env('QUEUE_FAILED_DRIVER', 'database-uuids'), 'database' => env('DB_CONNECTION', 'sqlite'), 'table' => 'failed_jobs'],
];
