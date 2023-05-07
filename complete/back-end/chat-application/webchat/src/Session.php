<?php
use SessionHandlerInterface;

class RatchetSessionHandler implements SessionHandlerInterface
{
    private $sessions = [];

    public function open($savePath, $sessionName)
    {
        return true;
    }

    public function close()
    {
        return true;
    }

    public function read($sessionId)
    {
        if (isset($this->sessions[$sessionId])) {
            return $this->sessions[$sessionId];
        } else {
            return '';
        }
    }

    public function write($sessionId, $sessionData)
    {
        $this->sessions[$sessionId] = $sessionData;
        return true;
    }

    public function destroy($sessionId)
    {
        unset($this->sessions[$sessionId]);
        return true;
    }

    public function gc($maxLifetime)
    {
        return true;
    }
}
