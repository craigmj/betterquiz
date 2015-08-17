<?php
/**
 * Tokens are the possible tokens that can be generated by the
 * tokenizer.
 */
class Tokens {
	const ERR = 0;
	const EOF = 1;
	const HEADERS_END = 2;
	const HEADER_KEY = 3;
	const HEADER_VALUE = 4;
	const QUESTION = 5;
	const OPTION_RIGHT = 6;
	const OPTION_WRONG = 7;
}
