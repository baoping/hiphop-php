<?php

// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/class.exception.php )
 *
 * Exception is the base class for all Exceptions.
 *
 */
class Exception {
  protected $message = '';  // exception message
  protected $code = 0;      // user defined exception code
  protected $previous = null;
  protected $file;          // source filename of exception
  protected $line;          // source line of exception
  protected $trace;         // full stacktrace

  /**
   * This may not be implemented in __construct(), because a sub-exception
   * can implement its own __construct(), losing the stacktrace. Instead,
   * the compiler will generate a call to this method inside C++ constructor,
   * just to make sure $this->trace is always populated.
   */
  final function __init__() {
    $this->trace = debug_backtrace();

    // removing exception constructor stacks to be consistent with PHP
    while (!empty($this->trace)) {
      $top = $this->trace[0];
      if (empty($top['class']) ||
          (strcasecmp($top['function'], '__init__') &&
           strcasecmp($top['function'], '__construct') &&
           strcasecmp($top['function'], $top['class'])) ||
          (strcasecmp($top['class'], 'exception') &&
           !is_subclass_of($top['class'], 'exception'))) {
        break;
      }
      $frame = array_shift($this->trace);
    }

    if (isset($frame['file'])) $this->file = $frame['file'];
    if (isset($frame['line'])) $this->line = $frame['line'];
  }

  function __construct($message = '', $code = 0, Exception $previous = null) {
    $this->message = $message;
    $this->code = $code;
    $this->previous = $previous;
  }

  // message of exception
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/exception.getmessage.php )
 *
 * Returns the Exception message.
 *
 * @return     mixed   Returns the Exception message as a string.
 */
  final function getMessage() {
    return $this->message;
  }

  // message of exception
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/exception.getprevious.php )
 *
 * Returns the previous Exception.
 *
 * @return     mixed   Returns the previous Exception if available or NULL otherwise.
 */
  final function getPrevious() {
    return $this->previous;
  }

  // code of exception
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/exception.getcode.php )
 *
 * Returns the Exception code.
 *
 * @return     mixed   Returns the Exception code as a integer.
 */
  final function getCode() {
    return $this->code;
  }

  // source filename
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/exception.getfile.php )
 *
 * Get the name of the file the exception was thrown from.
 *
 * @return     mixed   Returns the filename in which the exception was
 *                     thrown.
 */
  final function getFile() {
    return $this->file;
  }

  // source line
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/exception.getline.php )
 *
 * Returns line number where the exception was thrown.
 *
 * @return     mixed   Returns the line number where the exception was
 *                     thrown.
 */
  final function getLine() {
    return $this->line;
  }

  // an array of the backtrace()
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/exception.gettrace.php )
 *
 * Returns the Exception stack trace.
 *
 * @return     mixed   Returns the Exception stack trace as an array.
 */
  final function getTrace() {
    return $this->trace;
  }

  // formated string of trace
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/exception.gettraceasstring.php )
 *
 * Returns the Exception stack trace as a string.
 *
 * @return     mixed   Returns the Exception stack trace as a string.
 */
  final function getTraceAsString() {
    // works with the new FrameInjection-based stacktrace.
    $i = 0;
    $s = "";
    foreach ($this->getTrace() as $frame) {
      if (!is_array($frame)) continue;
      $s .= "#$i " .
        (isset($frame['file']) ? $frame['file'] : "") . "(" .
        (isset($frame['line']) ? $frame['line'] : "") . "): " .
        (isset($frame['class']) ? $frame['class'] . $frame['type'] : "") .
        $frame['function'] . "()\n";
      $i++;
    }
    $s .= "#$i {main}";
    return $s;
  }

  /* Overrideable */
  // formated string for display
  function __toString() {
    return "exception '" . get_class($this) . "' with message '" .
      $this->getMessage() . "' in " . $this->getFile() . ":" .
      $this->getLine() . "\nStack trace:\n" . $this->getTraceAsString();
  }
}

// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/class.logicexception.php )
 *
 * Exception thrown if a logic expression is invalid
 *
 */
class LogicException extends Exception {}
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from
 * http://php.net/manual/en/class.badfunctioncallexception.php )
 *
 * Exception thrown if a callback refers to an undefined function or if
 * some arguments are missing
 *
 */
  class BadFunctionCallException extends LogicException {}
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/class.badmethodcallexception.php
 * )
 *
 * Exception thrown if a callback refers to an undefined method or if some
 * arguments are missing
 *
 */
    class BadMethodCallException extends BadFunctionCallException {}
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/class.domainexception.php )
 *
 * Exception thrown if a value does not adhere to a defined valid data
 * domain
 *
 */
  class DomainException          extends LogicException {}
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from
 * http://php.net/manual/en/class.invalidargumentexception.php )
 *
 * Exception thrown if an argument does not match with the expected value
 *
 */
  class InvalidArgumentException extends LogicException {}
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/class.lengthexception.php )
 *
 * Exception thrown if a length is invalid
 *
 */
  class LengthException          extends LogicException {}
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/class.outofrangeexception.php )
 *
 * Exception thrown when a value does not match with a range
 *
 */
  class OutOfRangeException      extends LogicException {}
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/class.runtimeexception.php )
 *
 * Exception thrown if an error which can only be found on runtime occurs
 *
 */
class RuntimeException extends Exception {}
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/class.outofboundsexception.php )
 *
 * Exception thrown if a value is not a valid key
 *
 */
  class OutOfBoundsException     extends RuntimeException {}
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/class.overflowexception.php )
 *
 * Exception thrown when you add an element into a full container
 *
 */
  class OverflowException        extends RuntimeException {}
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/class.rangeexception.php )
 *
 * Exception thrown when an invalid range is given.
 *
 */
  class RangeException           extends RuntimeException {}
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/class.underflowexception.php )
 *
 * Exception thrown when you try to remove an element of an empty
 * container
 *
 */
  class UnderflowException       extends RuntimeException {}
// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from
 * http://php.net/manual/en/class.unexpectedvalueexception.php )
 *
 * Exception thrown if a value does not match with a set of values
 *
 */
  class UnexpectedValueException extends RuntimeException {}

// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/class.errorexception.php )
 *
 * An Error Exception.
 *
 */
class ErrorException extends Exception {
  protected $severity;
  public function __construct($message = "", $code = 0, $severity = 0,
                              $filename = null, $lineno = null) {
    parent::__construct($message, $code);
    $this->severity = $severity;
    if ($filename !== null) {
      $this->file = $filename;
    }
    if ($lineno !== null) {
      $this->line = $lineno;
    }
  }

// Do NOT modifiy this doc comment block generated by idl/sysdoc.php
/**
 * ( excerpt from http://php.net/manual/en/errorexception.getseverity.php )
 *
 * Returns the severity of the exception.
 *
 * @return     mixed   Returns the severity level of the exception.
 */
  final public function getSeverity() { return $this->severity; }
}


