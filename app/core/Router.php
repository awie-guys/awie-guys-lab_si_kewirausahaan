<?php

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function get(string $uri, string|callable $action): void
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post(string $uri, string|callable $action): void
    {
        $this->addRoute('POST', $uri, $action);
    }

    private function addRoute(string $method, string $uri, string|callable $action): void
    {
        $uri = $this->normalizeUri($uri);

        $this->routes[$method][] = [
            'uri' => $uri,
            'action' => $action,
            'pattern' => $this->makePattern($uri),
        ];
    }

    public function run(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri = $this->getCurrentUri();

        if (!isset($this->routes[$method])) {
            $this->abort(404, 'HTTP method tidak didukung.');
        }

        foreach ($this->routes[$method] as $route) {
            if (preg_match($route['pattern'], $uri, $matches)) {
                array_shift($matches);

                $params = array_map('urldecode', $matches);

                $this->dispatch($route['action'], $params);
                return;
            }
        }

        $this->abort(404, 'Route tidak ditemukan.');
    }

    private function dispatch(string|callable $action, array $params = []): void
    {
        if (is_callable($action)) {
            call_user_func_array($action, $params);
            return;
        }

        if (!str_contains($action, '@')) {
            $this->abort(500, 'Format action route tidak valid.');
        }

        [$controllerName, $methodName] = explode('@', $action, 2);

        $controllerFile = dirname(__DIR__) . '/controllers/' . $controllerName . '.php';

        if (!file_exists($controllerFile)) {
            $this->abort(404, 'Controller tidak ditemukan: ' . $controllerName);
        }

        require_once $controllerFile;

        if (!class_exists($controllerName)) {
            $this->abort(500, 'Class controller tidak ditemukan: ' . $controllerName);
        }

        $controller = new $controllerName();

        if (!method_exists($controller, $methodName)) {
            $this->abort(404, 'Method tidak ditemukan: ' . $controllerName . '@' . $methodName);
        }

        call_user_func_array([$controller, $methodName], $params);
    }

    private function makePattern(string $uri): string
    {
        $pattern = preg_quote($uri, '#');

        $pattern = preg_replace(
            '#\\\\\{[a-zA-Z_][a-zA-Z0-9_]*\\\\\}#',
            '([^/]+)',
            $pattern
        );

        return '#^' . $pattern . '$#';
    }

    private function getCurrentUri(): string
    {
        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

        $scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
        $projectDir = str_replace('\\', '/', dirname($scriptDir));

        $possibleBases = array_filter([
            rtrim($scriptDir, '/'),
            rtrim($projectDir, '/'),
        ]);

        foreach ($possibleBases as $base) {
            if ($base !== '' && $base !== '/' && str_starts_with($uri, $base)) {
                $uri = substr($uri, strlen($base));
                break;
            }
        }

        return $this->normalizeUri($uri);
    }

    private function normalizeUri(string $uri): string
    {
        $uri = '/' . trim($uri, '/');

        if ($uri !== '/') {
            $uri = rtrim($uri, '/');
        }

        return $uri;
    }

    private function abort(int $statusCode = 404, string $message = ''): void
    {
        http_response_code($statusCode);

        $viewFile = dirname(__DIR__) . '/views/errors/' . $statusCode . '.php';

        if (file_exists($viewFile)) {
            require $viewFile;
            exit;
        }

        $safeMessage = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');

        echo '<h1>' . $statusCode . '</h1>';
        echo '<p>' . ($safeMessage ?: 'Halaman tidak ditemukan.') . '</p>';

        exit;
    }
}