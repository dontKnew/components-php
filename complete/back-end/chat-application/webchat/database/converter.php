<?php
// used to get mysql database connection
class Converter
{
    public  function stringToBinary($string)
    {
        $characters = str_split($string);

        $binary = [];
        foreach ($characters as $character) {
            $data = unpack('H*', $character);
            $binary[] = base_convert($data[1], 16, 2);
        }
        
        return implode(' ', $binary);
    }

    public function binaryToString($binary)
    {
        $binaries = explode(' ', $binary);

        $string = null;
        foreach ($binaries as $binary) {
            $string .= pack('H*', dechex(bindec($binary)));
        }

        return $string;
    }

  public  function timeAgo($time_ago)
	{
		$time_ago = strtotime($time_ago);
		$cur_time   = time();
		$time_elapsed   = $cur_time - $time_ago;
		$seconds    = $time_elapsed;
		$minutes    = round($time_elapsed / 60);
		$hours      = round($time_elapsed / 3600);
		$days       = round($time_elapsed / 86400);
		$weeks      = round($time_elapsed / 604800);
		$months     = round($time_elapsed / 2600640);
		$years      = round($time_elapsed / 31207680);
		// Seconds
		if ($seconds <= 60) {
			return "just now";
		}
		//Minutes
		else if ($minutes <= 60) {
			if ($minutes == 1) {
				return "1 mint ago";
			} else {
				return "$minutes minutes ago";
			}
		}
		//Hours
		else if ($hours <= 24) {
			if ($hours == 1) {
				return "1 hour ago";
			} else {
				return "$hours hrs ago";
			}
		}
		//Days
		else if ($days <= 7) {
			if ($days == 1) {
				return "yesterday";
			} else {
				return "$days days ago";
			}
		}
		//Weeks
		else if ($weeks <= 4.3) {
			if ($weeks == 1) {
				return "7 week ago";
			} else {
				return "$weeks weeks ago";
			}
		}
		//Months
		else if ($months <= 12) {
			if ($months == 1) {
				return "1 month ago";
			} else {
				return "$months months ago";
			}
		}
		//Years
		else {
			if ($years == 1) {
				return "1 year ago";
			} else {
				return "$years years ago";
			}
		}
	}
}

class DotEnv
{
    /**
     * The directory where the .env file can be located.
     *
     * @var string
     */
    protected $path;


    public function __construct(string $path)
    {
        if(!file_exists($path)) {
            throw new \InvalidArgumentException(sprintf('%s does not exist', $path));
        }
        $this->path = $path;
    }

    public function load() :void
    {
        if (!is_readable($this->path)) {
            throw new \RuntimeException(sprintf('%s file is not readable', $this->path));
        }

        $lines = file($this->path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {

            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value);

            if (!array_key_exists($name, $_SERVER) && !array_key_exists($name, $_ENV)) {
                putenv(sprintf('%s=%s', $name, $value));
                $_ENV[$name] = $value;
                $_SERVER[$name] = $value;
            }
        }
    }
}