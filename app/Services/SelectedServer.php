<?php


namespace App\Services;


use App\Server;
use Illuminate\Http\Request;

class SelectedServer
{
    public const BY_ALL = 0,
                BY_ROUTE = 1,
                BY_AUTH = 2;

    protected $request;

    protected $server;

    protected $selected;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function init(int $by)
    {
        switch ($by)
        {
            case self::BY_ROUTE:
                $this->selected = $this->request->route('server');
                break;

            case self::BY_AUTH:
                $this->selected = session('server_id');
                break;

            default:
                $this->selected = $this->request->route('server', session('server_id'));
        }

        if ($this->hasServer()) {
            $this->server = Server::findOrFail($this->selected);
        }
    }

    public function getServer(): Server
    {
        return $this->server;
    }

    public function hasServer(): bool
    {
        return !is_null($this->selected);
    }

    public static function get(): SelectedServer
    {
        return app(self::class);
    }
}